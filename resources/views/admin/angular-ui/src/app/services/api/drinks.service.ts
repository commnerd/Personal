import { Injectable } from '@angular/core';
import { BaseService } from './base.service';

@Injectable({
  providedIn: 'root'
})
export class DrinksService extends BaseService{
  protected override endpoint: string = '/api/drinks';

  constructor() {
    super();
  }
}
