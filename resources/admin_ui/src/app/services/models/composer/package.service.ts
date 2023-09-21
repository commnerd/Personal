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

  save(pkg: Package): Observable<Package> {
    if(pkg?.id != undefined && pkg.id != null) {
      return this.httpClient.put<Package>('/api/composer/packages', pkg, { headers: {'Authorization': 'Bearer ' + localStorage.getItem('jwt') }});
    }
    return this.httpClient.post<Package>('/api/composer/packages', pkg, { headers: {'Authorization': 'Bearer ' + localStorage.getItem('jwt') }});
  }
}
