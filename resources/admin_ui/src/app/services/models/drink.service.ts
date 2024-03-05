import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Drink } from '@interfaces/drink';
import { LaravelModelService } from "./laravel_model.service";

@Injectable({
  providedIn: 'root'
})
export class DrinkService extends LaravelModelService<Drink> {

  protected path = '/api/drinks';

  constructor(
    override httpClient: HttpClient
  ) {
    super(httpClient);
  }
}
