import { Injectable } from '@angular/core';
import { BaseService } from './base.service';
import { Drink } from '@models/api/drink';
@Injectable({
  providedIn: 'root'
})
export class DrinksService extends BaseService<Drink>{
  protected override endpoint: string = '/api/drinks';

  constructor() {
    super();
  }
}
