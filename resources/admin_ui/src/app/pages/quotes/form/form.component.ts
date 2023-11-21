import {Component, EventEmitter, Input, OnChanges, OnInit, Output, SimpleChanges} from '@angular/core';
import { Quote } from '../../../interfaces/quote';
import { QuoteService } from '../../../services/models/quote.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent implements OnInit {

  @Input() quote !: Quote;
  @Output() submit: EventEmitter<Quote> = new EventEmitter<Quote>();
  quoteForm!: FormGroup;
  Editor = ClassicEditor;

  constructor(
    private formBuilder: FormBuilder,
    private quoteService: QuoteService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.quoteForm = this.formBuilder.group({
      quote: '',
      source: '',
      active: true,
    });
    if(this.quote) {
      this.quoteForm.setValue({
        quote: this.quote.quote,
        source: this.quote.source,
        active: this.quote.active,
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
    } else {
      console.log(this.quoteForm.errors);
    }
  }
}
