import { Injectable } from '@angular/core';
import { BaseService } from './base.service';
import { Quote } from '@models/api/quote';
@Injectable({
  providedIn: 'root'
})
export class QuotesService extends BaseService<Quote> {
  protected override endpoint: string = '/api/quotes';
  constructor() {
    super();
  }
}
