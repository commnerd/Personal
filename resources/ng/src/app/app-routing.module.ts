import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from "@pages/home/home.component";
import { CoverComponent } from "@pages/cover/cover.component";

const routes: Routes = [
  { path: "", component: HomeComponent },
  { path: "home", component: CoverComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
