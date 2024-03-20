import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { IndexComponent } from "@pages/messages/index/index.component";
import { ShowComponent } from "@pages/messages/show/show.component";

const routes: Routes = [
  { path: '', component: IndexComponent },
  { path: ':id', component:ShowComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class MessagesRoutingModule { }
