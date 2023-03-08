import { Injectable } from '@angular/core';
import { BaseService } from './base.service';

@Injectable({
  providedIn: 'root'
})
export class QuotesService extends BaseService {
  protected override endpoint: string = '/api/quotes';
  constructor() {
    super();
  }
}
