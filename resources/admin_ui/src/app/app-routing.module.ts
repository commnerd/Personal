import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { loggedIn } from './guards/auth-guard.service';
import { SetJwtComponent } from './set-jwt/set-jwt.component';

const routes: Routes = [
  {
    path: '',
    canActivate: [loggedIn],
    loadChildren: () => import('./pages/pages.module').then(m => m.PagesModule)
  },
  {
    path: 'set-jwt',
    component: SetJwtComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
