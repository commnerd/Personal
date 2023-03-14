import { Component, Input } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { Quote } from '@models/api/quote';
import { QuotesService } from '@services/api/quotes.service';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent {

  @Input() title: string = '';
  @Input() quote: Quote = { source: '', quote: '' };

  quoteForm = this.fb.group({
    source: [null, Validators.required],
    quote: [null, Validators.required],
    active: false,
  });

  constructor(
    private fb: FormBuilder,
    private quoteService: QuotesService,
    private router: Router
  ) {}

  onSubmit(): void {
    if(this.quoteForm.valid) {
      Object.assign(this.quote, this.quoteForm.value);
      let subscription = this.quoteService.save(this.quote).subscribe( quote => {
        this.router.navigate(['']);
        subscription.unsubscribe();
      });
    }
  }
}
