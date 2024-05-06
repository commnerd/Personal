import {Component, OnInit} from '@angular/core';
import {Observable, tap} from "rxjs";
import {Paginated} from "@interfaces/laravel/paginated";
import {MatDialog} from "@angular/material/dialog";
import {DrinkService} from "@services/models/drink.service";
import {Drink} from '@interfaces/drink';
import {ActivatedRoute, Params, Router} from "@angular/router";
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
  models: Paginated<Drink> | null = null;

  constructor(
    public dialog: MatDialog,
    private drinkService: DrinkService,
    private router: Router,
    private activatedRoute: ActivatedRoute
  ) {}

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe((params: Params) => {
      let page = 1;
      if(typeof params['page'] !== 'undefined') {
        page = params['page'];
      }
      let drinkListSubscription = this.drinkService.list(page).subscribe(rs => {
        this.models = rs;
        drinkListSubscription.unsubscribe();
      });
    });
  }

  addDrink() {
    this.router.navigate(['drinks', 'create']);
  }

  editDrink(drink: Drink) {
    this.router.navigate(['drinks', drink.id, 'edit']);
  }

  switchPage(event: PageEvent) {
    this.router.navigateByUrl(`/drinks?page=${event.pageIndex + 1}`)
  }

  deleteDrink(drink: Drink) {
    let dialogSubscription = this.dialog
      .open(DeleteConfirmationDialogComponent)
      .afterClosed()
      .subscribe(confirmation => {
        if(confirmation) {
          let deleteSubscription = this.drinkService.delete(drink.id!).subscribe(() => {
            this.ngOnInit();
            setTimeout(() => deleteSubscription.unsubscribe(), 0);
          });
        }
        setTimeout(() => dialogSubscription.unsubscribe(), 0);
      });
  }
}
