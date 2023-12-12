import { HttpClient, HttpErrorResponse } from "@angular/common/http";
import { Observable, throwError } from "rxjs";
import { Paginated } from "@interfaces/laravel/paginated";
import { Model } from "@interfaces/laravel/model";
import { catchError } from "rxjs/operators";

export abstract class LaravelModelService<T extends Model> {

  protected abstract path: string;

  constructor(
    protected httpClient: HttpClient
  ) {}

  list(): Observable<Paginated<T> | null> {
    return this.httpClient.get(this.path, { headers: {'Authorization': 'Bearer ' + localStorage.getItem('jwt') }}).pipe(
      catchError(this.handleError)
    ) as Observable<Paginated<T> | null>;
  }

  get(id: number): Observable<T | null> {
    return this.httpClient.get(`${this.path}/${id}`, { headers: {'Authorization': 'Bearer ' + localStorage.getItem('jwt') }}).pipe(
      catchError(this.handleError)
    ) as Observable<T | null>;
  }

  save(pkg: T): Observable<T | null> {
    if(!!pkg.id) {
      return this.httpClient.put<T>(`${this.path}/${pkg.id}`, pkg, { headers: {'Authorization': 'Bearer ' + localStorage.getItem('jwt') }}).pipe(
        catchError(this.handleError)
      ) as Observable<T | null>;
    }
    return this.httpClient.post<T>(this.path, pkg, { headers: {'Authorization': 'Bearer ' + localStorage.getItem('jwt') }}).pipe(
      catchError(this.handleError)
    ) as Observable<T | null>;
  }

  handleError(error: HttpErrorResponse) {
    switch(error.status) {
      case 401:
        window.location.href = '/api/login';
        break;
      default:
        console.error(`Backend returned code ${error.status}, body was: `, error.error);
        break;
    }
    if(error.message) {
      return throwError(() => error.message);
    }
    // Return an observable with a user-facing error message.
    return throwError(() => new Error('Something bad happened; please try again later.'));
  }
}
