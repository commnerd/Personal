import { Component, OnInit } from '@angular/core';
import { Paginated } from '../../../interfaces/laravel/paginated';
import { Quote } from '../../../interfaces/quote';
import { Observable } from 'rxjs';
import { QuoteService } from '../../../services/models/quote.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {

  page$ !: Observable<Paginated<Quote>>;

  constructor(
    private quoteService: QuoteService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.page$ = this.quoteService.list();
  }

  addQuote() {
    this.router.navigate(['quotes']);
  }

  editQuote(pkg: Quote) {
    this.router.navigate(['quotes']);
  }

  confirmQuoteDeletion(pkg: Quote) {

  }

  deleteQuote(quote: Quote) {

  }
}
