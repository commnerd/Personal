import { Component, Input, OnInit } from '@angular/core';
import { Quote } from '../../../interfaces/quote';
import { QuoteService } from '../../../services/models/quote.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent implements OnInit {

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
      resource: '',
      active: false,
    });
    if(this.quote) {
      this.quoteForm.setValue(this.quote);
    }
  }

  onSubmit() {
    let subscriber = this.quoteService.save(this.quoteForm.value).subscribe( (rs) => {
      subscriber.unsubscribe();
      this.router.navigate(['quotes']);
    });
  }
}