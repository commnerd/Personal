import { Injectable } from '@angular/core';
import { LaravelModelService } from "@services/models/laravel_model.service";
import { Restaurant } from "@interfaces/food/restaurant";
import { HttpClient } from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class RestaurantService extends LaravelModelService<Restaurant> {

  protected path = '/api/food/restaurants';

  constructor(
    override httpClient: HttpClient
  ) {
    super(httpClient);
  }
}
