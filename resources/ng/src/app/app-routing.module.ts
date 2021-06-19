import { RouterModule, Routes } from '@angular/router';
import { NgModule } from '@angular/core';

import { FourOhFourComponent } from '@pages/four-oh-four/four-oh-four.component';
import { CoverComponent } from '@pages/cover/cover.component';
import { HomeComponent } from '@pages/home/home.component';

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'home', component: CoverComponent},
  { path: '404', component: FourOhFourComponent },
  { path: '**', redirectTo: '/404' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
