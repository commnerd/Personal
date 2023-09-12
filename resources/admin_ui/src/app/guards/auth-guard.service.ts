import { Injectable, inject } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivateFn, RouterStateSnapshot } from '@angular/router';
import { ActivatedRoute } from '@angular/router'

import { LoadToggleService } from '../services/load-toggle.service';
import { debounce, timer } from 'rxjs';


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
    let subscription = this.activateRoute.queryParams.pipe(debounce(() => timer(10))).subscribe(params => {
      if(params['set_jwt']) {
        localStorage.setItem('jwt', params['set_jwt']);
        window.location.href = '/admin/';
      }
      if(!localStorage.getItem('jwt')) {
        this.loadToggleService.startLoading();
        window.location.href='/api/login';
      }
      setTimeout(() => subscription.unsubscribe(), 0);
    });
    return true;
  }
}

export const loggedIn: CanActivateFn =
    (route: ActivatedRouteSnapshot, state: RouterStateSnapshot) => {
      return inject(AuthGuardService).canActivate();
    };