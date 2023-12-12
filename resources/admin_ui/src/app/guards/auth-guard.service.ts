import { Injectable, inject } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivateFn, RouterStateSnapshot } from '@angular/router';
import { ActivatedRoute } from '@angular/router'

import { LoadToggleService } from '../services/load-toggle.service';
@Injectable({
  providedIn: 'root'
})
export class AuthGuardService {
  constructor(
    private activateRoute: ActivatedRoute,
    private loadToggleService: LoadToggleService
  )
  {}

  canActivate(): boolean {
    if(localStorage.getItem('jwt') == null) {
      window.location.href="/api/login";
    }
    return localStorage.getItem('jwt') !== null;
  }
}

export const loggedIn: CanActivateFn =
    (route: ActivatedRouteSnapshot, state: RouterStateSnapshot) => {
      return inject(AuthGuardService).canActivate();
    };
