import { Injectable } from '@angular/core';
import {
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpInterceptor
} from '@angular/common/http';
import { Observable } from 'rxjs';
import { catchError } from 'rxjs/operators';


@Injectable()
export class AuthInterceptorInterceptor implements HttpInterceptor {

  constructor() {}

  intercept(request: HttpRequest<unknown>, next: HttpHandler): Observable<HttpEvent<unknown>> {
    request.headers.append('Authorization', `Bearer ${localStorage.getItem('jwt')}`);
    return next.handle(request).pipe(catchError((err, caught) => {
      if(err.status  == 401) {
        
        localStorage.removeItem('jwt');
        window.location.href = '/';
      }
      return caught;
    }));
  }
}
