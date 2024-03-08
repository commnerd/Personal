import { Component, OnInit } from '@angular/core';
import { MatDialog } from "@angular/material/dialog";

import { Paginated } from '@interfaces/laravel/paginated';
import { Quote } from '@interfaces/quote';
import { Observable } from 'rxjs';
import { QuoteService } from '@services/models/quote.service';
import { Router } from '@angular/router';

import { DeleteConfirmationDialogComponent } from "@partials/delete-confirmation-dialog/delete-confirmation-dialog.component";
import { PageEvent } from '@angular/material/paginator';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {

  models$ !: Observable<Paginated<Quote> | null>;

  constructor(
    public dialog: MatDialog,
    private quoteService: QuoteService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.models$ = this.quoteService.list();
  }

  addQuote() {
    this.router.navigate(['quotes', 'create']);
  }

  editQuote(pkg: Quote) {
    this.router.navigate(['quotes', pkg.id, 'edit']);
  }

  switchPage(event: PageEvent) {
    this.models$ = this.quoteService.list(event.pageIndex + 1);
  }

  deleteQuote(quote: Quote) {
    let dialogSubscription = this.dialog
      .open(DeleteConfirmationDialogComponent)
      .afterClosed()
      .subscribe(confirmation => {
        if(confirmation) {
          let deleteSubscription = this.quoteService.delete(quote.id!).subscribe(() => {
            this.ngOnInit();
            setTimeout(() => deleteSubscription.unsubscribe());
          });
        }
        setTimeout(() => dialogSubscription.unsubscribe());
      });
  }
}
