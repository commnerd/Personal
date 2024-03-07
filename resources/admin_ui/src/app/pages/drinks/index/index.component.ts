import {Component, OnInit} from '@angular/core';
import {Observable} from "rxjs";
import {Paginated} from "@interfaces/laravel/paginated";
import {MatDialog} from "@angular/material/dialog";
import {DrinkService} from "@services/models/drink.service";
import {Drink} from '@interfaces/drink';
import {Router} from "@angular/router";
import {
  DeleteConfirmationDialogComponent
} from "@partials/delete-confirmation-dialog/delete-confirmation-dialog.component";


@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {
  models$ !: Observable<Paginated<Drink> | null>;

  constructor(
    public dialog: MatDialog,
    private drinkService: DrinkService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.models$ = this.drinkService.list();
  }

  addDrink() {
    this.router.navigate(['drinks', 'create']);
  }

  editDrink(drink: Drink) {
    this.router.navigate(['drinks', drink.id, 'edit']);
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
