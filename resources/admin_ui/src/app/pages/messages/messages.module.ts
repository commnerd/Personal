import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MessagesRoutingModule } from "@pages/messages/messages-routing.module";
import { IndexComponent } from './index/index.component';
import { ShowComponent } from './show/show.component';
import { MatButtonModule } from "@angular/material/button";
import { MatIconModule } from "@angular/material/icon";
import { MatPaginatorModule } from "@angular/material/paginator";



@NgModule({
  declarations: [
    IndexComponent,
    ShowComponent
  ],
  imports: [
    CommonModule,
    MessagesRoutingModule,
    MatButtonModule,
    MatIconModule,
    MatPaginatorModule
  ]
})
export class MessagesModule { }
