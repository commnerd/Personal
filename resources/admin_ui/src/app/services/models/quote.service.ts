import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Quote } from '../../interfaces/quote';
import { LaravelModelService } from "./laravel_model.service";

@Injectable({
  providedIn: 'root'
})
export class QuoteService extends LaravelModelService<Quote> {

  protected path = '/api/quotes';

  constructor(
    override httpClient: HttpClient
  ) {
    super(httpClient);
  }
}
