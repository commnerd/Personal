import { Injectable, inject } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivateFn, RouterStateSnapshot } from '@angular/router';
import { ActivatedRoute } from '@angular/router'

import { lastValueFrom } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class AuthGuardService {
  constructor(private activateRoute: ActivatedRoute)
  {}

  canActivate(): boolean {
    let subscriber = this.activateRoute.queryParams.subscribe((params: {[key: string]: string}) => {
      if(params['set_jwt']) {
        localStorage.setItem('jwt', params['set_jwt']);
        window.location.href = '/admin/';
      }
      if(!localStorage.getItem('jwt')) {
        window.location.href='/api/login';
      }
      setTimeout(() => subscriber.unsubscribe(), 0);
    });
    return true;
  }
}

export const loggedIn: CanActivateFn =
    (route: ActivatedRouteSnapshot, state: RouterStateSnapshot) => {
      return inject(AuthGuardService).canActivate();
    };