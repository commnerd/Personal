import { Injectable, inject } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivateFn, RouterStateSnapshot } from '@angular/router';


@Injectable({
  providedIn: 'root'
})
export class AuthGuardService {
  constructor() { }

  canActivate(): boolean {
    window.location.href = '/api/login';
    return false;
  }

}

export const loggedIn: CanActivateFn =
    (route: ActivatedRouteSnapshot, state: RouterStateSnapshot) => {
      return inject(AuthGuardService).canActivate();
    };