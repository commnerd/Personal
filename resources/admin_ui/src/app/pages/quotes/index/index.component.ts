import { Component, OnInit } from '@angular/core';
import { MatDialog } from "@angular/material/dialog";

import { Paginated } from '@interfaces/laravel/paginated';
import { Quote } from '@interfaces/quote';
import { first } from 'rxjs';
import { QuoteService } from '@services/models/quote.service';
import { ActivatedRoute, Router, Params } from '@angular/router';

import { DeleteConfirmationDialogComponent } from "@partials/delete-confirmation-dialog/delete-confirmation-dialog.component";
import { PageEvent } from '@angular/material/paginator';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {

  models: Paginated<Quote> | null = null;

  constructor(
    public dialog: MatDialog,
    private quoteService: QuoteService,
    private router: Router,
    private activatedRoute: ActivatedRoute
  ) {}

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe((params: Params) => {
      let page = 1;
      if(typeof params['page'] !== 'undefined') {
        page = params['page'];
      }
      this.quoteService.list(page).pipe(first()).subscribe(rs => {
        this.models = rs;
      });
    });
  }

  addQuote() {
    this.router.navigate(['quotes', 'create']);
  }

  editQuote(pkg: Quote) {
    this.router.navigate(['quotes', pkg.id, 'edit']);
  }

  switchPage(event: PageEvent) {
    this.router.navigateByUrl(`/quotes?page=${event.pageIndex + 1}`)
  }

  deleteQuote(quote: Quote) {
    this.dialog
      .open(DeleteConfirmationDialogComponent)
      .afterClosed()
      .pipe(first())
      .subscribe(confirmation => {
        if(confirmation) {
          this.quoteService.delete(quote.id!).pipe(first()).subscribe(() => {
            this.ngOnInit();
          });
        }
      });
  }
}
