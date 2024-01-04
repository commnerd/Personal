import {Component, Input, OnChanges, OnInit, SimpleChanges} from '@angular/core';
import { Quote } from '@interfaces/quote';
import { QuoteService } from '@services/models/quote.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent implements OnInit, OnChanges {

  @Input() quote !: Quote | null;
  quoteForm!: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private quoteService: QuoteService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.quoteForm = this.formBuilder.group({
      quote: '',
      source: '',
      active: false,
    });
  }

  ngOnChanges(changes: SimpleChanges): void
  {
    console.log(changes);

    if(this.quote && this.quoteForm) {
      this.quoteForm.setValue({
        quote: changes['quote']?.currentValue.quote,
        source: changes['quote']?.currentValue.source,
        active: changes['quote']?.currentValue.active
      });
    }
  }

  onSubmit() {
    let subscriber = this.quoteService.save(this.quoteForm.value).subscribe( (rs) => {
      subscriber.unsubscribe();
      this.router.navigate(['quotes']);
    });
  }
}
