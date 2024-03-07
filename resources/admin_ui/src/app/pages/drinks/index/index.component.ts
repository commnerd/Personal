import {Component, OnInit} from '@angular/core';
import {Observable, tap} from "rxjs";
import {Paginated} from "@interfaces/laravel/paginated";
import {MatDialog} from "@angular/material/dialog";
import {DrinkService} from "@services/models/drink.service";
import {Drink} from '@interfaces/drink';
import {Router} from "@angular/router";
import {
  DeleteConfirmationDialogComponent
} from "@partials/delete-confirmation-dialog/delete-confirmation-dialog.component";
import {PageEvent} from "@angular/material/paginator";


@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {
  models$ !: Observable<Paginated<Drink> | null>;
  length = 0;
  pageIndex = 1;
  pageSize = 0;

  constructor(
    public dialog: MatDialog,
    private drinkService: DrinkService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.models$ = this.drinkService.list()
      .pipe(tap(page => this.pageIndex = page?.current_page ? page.current_page - 1 : 0));;
  }

  addDrink() {
    this.router.navigate(['drinks', 'create']);
  }

  editDrink(drink: Drink) {
    this.router.navigate(['drinks', drink.id, 'edit']);
  }

  switchPage(event: PageEvent) {
    this.models$ = this.drinkService.list(event.pageIndex)
      .pipe(tap(page => this.pageIndex = page?.current_page ? page.current_page : 1));
  }

  deleteDrink(drink: Drink) {
    let dialogSubscription = this.dialog
      .open(DeleteConfirmationDialogComponent)
      .afterClosed()
      .subscribe(result => {
        let deleteSubscription = this.drinkService.delete(drink.id!).subscribe(() => {
          this.ngOnInit();
          setTimeout(() => deleteSubscription.unsubscribe());
        });
        setTimeout(() => dialogSubscription.unsubscribe());
      });
  }
}
