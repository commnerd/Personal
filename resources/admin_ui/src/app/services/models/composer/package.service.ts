import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Package } from '../../../interfaces/composer/package';
import { Paginated } from '../../../interfaces/laravel/paginated';

@Injectable({
  providedIn: 'root'
})
export class PackageService {

  constructor(
    protected httpClient: HttpClient
  ) {}

  list(): Observable<Paginated<Package>> {
    return this.httpClient.get('/api/composer/packages', { headers: {'Authorization': 'Bearer ' + localStorage.getItem('jwt') }}) as Observable<Paginated<Package>>;
  }
}
