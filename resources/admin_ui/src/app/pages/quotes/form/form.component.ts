import { Component, Input, OnChanges, OnInit, SimpleChanges } from '@angular/core';
import { Quote } from '@interfaces/quote';
import { QuoteService } from '@services/models/quote.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Location } from '@angular/common';
import { first } from "rxjs";

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent implements OnInit, OnChanges {

  @Input() quote!: Quote | null;
  quoteForm!: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private quoteService: QuoteService,
    private location: Location
  ) {}

  ngOnInit(): void {
    this.quote = {
      quote: '',
      source: '',
      active: true,
    };
    this.quoteForm = this.formBuilder.group(this.quote);
  }

  ngOnChanges(changes: SimpleChanges): void
  {
    if(this.quote) {
      this.quoteForm.setValue({
        quote: changes['quote']?.currentValue.quote,
        source: changes['quote']?.currentValue.source,
        active: changes['quote']?.currentValue.active
      });
    }
  }

  onSubmit() {
    this.quoteService.save(Object.assign(this.quote!, this.quoteForm.value)).pipe(first()).subscribe( (rs) => {
      this.location.back();
    });
  }
}
