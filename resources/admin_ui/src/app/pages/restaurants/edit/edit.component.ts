import {Component, Input} from '@angular/core';
import {first, Observable} from "rxjs";
import {ActivatedRoute} from "@angular/router";
import { Restaurant } from "@interfaces/food/restaurant";
import { RestaurantService } from "@services/models/food/restaurant.service";

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent {
  @Input() restaurant$!: Observable<Restaurant | null>;

  constructor(
    private restaurantService: RestaurantService,
    private route: ActivatedRoute,
  ) {}

  ngOnInit(): void {
    this.route.params.pipe(first()).subscribe(params => {
      this.restaurant$ = this.restaurantService.get(params['id'] as number);
    });
  }
}
