import { BaseService } from './base.service';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Quote } from '@models/api/quote';

@Injectable({
  providedIn: 'root'
})
export class QuotesService extends BaseService<Quote> {
  protected override endpoint: string = '/api/quotes';
  constructor(protected override httpClient: HttpClient ) {
    super(httpClient);
  }
}
