import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Quote } from '../../interfaces/quote';
import { Paginated } from '../../interfaces/laravel/paginated';

@Injectable({
  providedIn: 'root'
})
export class QuoteService {

  constructor(
    protected httpClient: HttpClient
  ) {}

  list(): Observable<Paginated<Quote>> {
    return this.httpClient.get('/api/quotes', { headers: {'Authorization': 'Bearer ' + localStorage.getItem('jwt') }}) as Observable<Paginated<Quote>>;
  }

  get(id: number): Observable<Quote> {
    return this.httpClient.get(`/api/quotes/${id}`, { headers: {'Authorization': 'Bearer ' + localStorage.getItem('jwt') }}) as Observable<Quote>;
  }

  save(pkg: Quote): Observable<Quote> {
    if(!!pkg.id) {
      return this.httpClient.put<Quote>('/api/quotes', pkg, { headers: {'Authorization': 'Bearer ' + localStorage.getItem('jwt') }});
    }
    return this.httpClient.post<Quote>('/api/quotes', pkg, { headers: {'Authorization': 'Bearer ' + localStorage.getItem('jwt') }});
  }
}
