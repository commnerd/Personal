import { Component } from '@angular/core';
import { first } from "rxjs";
import { Paginated } from "@interfaces/laravel/paginated";
import { RestaurantService } from "@services/models/food/restaurant.service";
import { ActivatedRoute, Params, Router } from "@angular/router";
import { MatDialog } from "@angular/material/dialog";
import { PageEvent } from "@angular/material/paginator";
import {
  DeleteConfirmationDialogComponent
} from "@partials/delete-confirmation-dialog/delete-confirmation-dialog.component";
import { Restaurant } from "@interfaces/food/restaurant";

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent {
  models: Paginated<Restaurant> | null = null;

  constructor(
    private restaurantService: RestaurantService,
    private router: Router,
    private dialog: MatDialog,
    private activatedRoute: ActivatedRoute
  ) {}

  ngOnInit(): void {
    this.activatedRoute.queryParams.pipe(first()).subscribe((params: Params) => {
      let page = 1;
      if(typeof params['page'] !== 'undefined') {
        page = params['page'];
      }
      this.restaurantService.list(page).pipe(first()).subscribe(rs => {
        this.models = rs;
      });
    });
  }

  addRestaurant() {
    this.router.navigate(['restaurants', 'create']);
  }

  editRestaurant(rnt: Restaurant) {
    this.router.navigate(['restaurants', rnt.id, 'edit']);
  }

  switchPage(event: PageEvent) {
    this.router.navigateByUrl(`/restaurants?page=${event.pageIndex + 1}`)
  }

  deleteRestaurant(rnt: Restaurant) {
    this.dialog
      .open(DeleteConfirmationDialogComponent)
      .afterClosed()
      .pipe(first())
      .subscribe(confirmation => {
        if(confirmation) {
          this.restaurantService.delete(rnt.id!).pipe(first()).subscribe(() => {
            this.ngOnInit();
          });
        }
      });
  }
}
