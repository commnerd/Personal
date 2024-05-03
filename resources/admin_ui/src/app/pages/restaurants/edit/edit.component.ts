import {Component, Input} from '@angular/core';
import {Observable} from "rxjs";
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
    let paramSubscriber = this.route.params.subscribe(params => {
      this.restaurant$ = this.restaurantService.get(params['id'] as number);
      setTimeout(() => paramSubscriber.unsubscribe(), 0);
    });
  }
}
