import {Injectable, inject, Inject} from '@angular/core';
import {ActivatedRouteSnapshot, CanActivateFn, RouterStateSnapshot} from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class AuthGuardService {
  private win: Window;

  constructor(
    @Inject('Window') window: Window,
  )
  {
    this.win = window;
  }

  canActivate(): boolean {
    if(localStorage.getItem('jwt') == null) {
      this.win.location.href="/api/login";
    }
    return localStorage.getItem('jwt') !== null;
  }
}

export const loggedIn: CanActivateFn =
    (route: ActivatedRouteSnapshot, state: RouterStateSnapshot) => {
      return inject(AuthGuardService).canActivate();
    };
