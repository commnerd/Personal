import { Component, OnInit } from '@angular/core';
import { Paginated } from '../../../interfaces/laravel/paginated';
import { Quote } from '../../../interfaces/quote';
import { Observable, take, tap } from 'rxjs';
import { QuoteService } from '../../../services/models/quote.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {

  noQuotesFound: boolean = false;
  models$ !: Observable<Paginated<Quote>>;

  constructor(
    private quoteService: QuoteService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.models$ = this.quoteService.list().pipe(
      tap(page => this.noQuotesFound = page != null && page?.data != null && page.data.length < 1 )
    );
  }

  addQuote() {
    this.router.navigate(['quotes', 'create']);
  }

  editQuote(pkg: Quote) {
    this.router.navigate(['quotes', pkg.id, 'edit']);
  }

  confirmQuoteDeletion(pkg: Quote) {

  }

  deleteQuote(quote: Quote) {

  }
}
