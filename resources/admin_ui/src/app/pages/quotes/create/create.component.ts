import { Component } from '@angular/core';
import {Quote} from "@interfaces/quote";
import { QuoteService } from "@services/models/quote.service";

@Component({
  selector: 'app-create',
  templateUrl: './create.component.html',
  styleUrls: ['./create.component.scss']
})
export class CreateComponent {
  quote: Quote = {
    quote: '',
    source: '',
    active: true,
  };

  constructor(
    private quoteService: QuoteService,
  ) {}

}
