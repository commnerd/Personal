import {Component, Input, OnChanges, OnInit, SimpleChanges} from '@angular/core';
import { Quote } from '../../../interfaces/quote';
import { QuoteService } from '../../../services/models/quote.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent implements OnInit, OnChanges {

  @Input() quote !: Quote;
  quoteForm!: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private quoteService: QuoteService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.quote = {} as Quote;
    this.quoteForm = this.formBuilder.group({
      quote: '',
      source: '',
      active: true,
    });
  }

  ngOnChanges(changes: SimpleChanges) {
    if(changes['quote']?.currentValue) {
      this.quoteForm.setValue({
        quote: changes['quote'].currentValue.quote,
        source: changes['quote'].currentValue.source,
        active: changes['quote'].currentValue.active,
      });
    }
  }

  onSubmit() {
    if(this.quoteForm.valid) {
      if(this.quote) {
        this.quote = Object.assign(this.quote, this.quoteForm.value);
      }
      let subscriber = this.quoteService.save(this.quote).subscribe( (rs) => {
        subscriber.unsubscribe();
        this.router.navigate(['quotes']);
      });
    }
  }
}
