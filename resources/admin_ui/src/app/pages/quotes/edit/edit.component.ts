import { Component, Input, OnInit } from '@angular/core';
import { Quote } from '../../../interfaces/quote';
import { Observable, of } from 'rxjs';
import { QuoteService } from '../../../services/models/quote.service';
import { ActivatedRoute, ParamMap } from '@angular/router';

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent implements OnInit {

  quote: Quote | null = null;

  constructor(
    private quoteService: QuoteService,
    private route: ActivatedRoute,
  ) {}

  ngOnInit(): void {
    let paramSubscriber = this.route.params.subscribe(params => {
      let serviceSubscriber = this.quoteService.get(params['id'] as number).subscribe(quote => {
        serviceSubscriber.unsubscribe();
        setTimeout(() => this.quote = quote, 0);
      });
      setTimeout(() => paramSubscriber.unsubscribe(), 0);
    });
  }


}
