import { BaseService } from './base.service';
import { Drink } from '@models/api/drink';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class DrinksService extends BaseService<Drink>{
  protected override endpoint: string = '/api/drinks';
  constructor(protected override httpClient: HttpClient ) {
    super(httpClient);
  }
}
