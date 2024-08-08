import { Component, OnInit } from '@angular/core';
import { Quote } from '../../../interfaces/quote';
import { first, Observable } from 'rxjs';
import { QuoteService } from '../../../services/models/quote.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent implements OnInit {

  quote$!: Observable<Quote | null>;

  constructor(
    private quoteService: QuoteService,
    private route: ActivatedRoute,
  ) {}

  ngOnInit(): void {
    let paramSubscriber = this.route.params.pipe(first()).subscribe(params => {
      this.quote$ = this.quoteService.get(params['id'] as number);
    });
  }


}
