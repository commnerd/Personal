import { Component, OnInit } from '@angular/core';

import { Observable } from 'rxjs';

import { Paginated } from '@models/api/laravel/paginated';
import { QuotesService } from '@services/api/quotes.service';
import { Quote } from '@models/api/quote';
import { PageTitleService } from '@services/structure/page-title.service';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {

  quotes$: Observable<Paginated<Quote>> = this.quotesService.list();

  constructor(
    private quotesService: QuotesService,
    private pageTitleService: PageTitleService
  ) { }

  ngOnInit(): void {
    this.pageTitleService.set('Quotes')
  }

}
