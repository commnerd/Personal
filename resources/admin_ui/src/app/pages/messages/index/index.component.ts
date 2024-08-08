import { Component, OnInit } from '@angular/core';
import { first } from "rxjs";
import { Paginated } from "@interfaces/laravel/paginated";
import { ContactMessage } from "@interfaces/contact-message";
import { MatDialog } from "@angular/material/dialog";
import { ActivatedRoute, Params, Router } from "@angular/router";
import { ContactMessageService } from "@services/models/contact-message.service";
import { PageEvent } from "@angular/material/paginator";
import {
  DeleteConfirmationDialogComponent
} from "@partials/delete-confirmation-dialog/delete-confirmation-dialog.component";

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {

  models: Paginated<ContactMessage> | null = null;

  constructor(
    public dialog: MatDialog,
    private contactMessageService: ContactMessageService,
    private router: Router,
    private activatedRoute: ActivatedRoute
  ) {}

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe((params: Params) => {
      let page = 1;
      if(typeof params['page'] !== 'undefined') {
        page = params['page'];
      }
      this.contactMessageService.list(page).pipe(first()).subscribe(rs => {
        this.models = rs;
      });
    });
  }

  showContactMessage(msg: ContactMessage) {
    this.router.navigate(['messages', msg.id]);
  }

  switchPage(event: PageEvent) {
    this.router.navigateByUrl(`/messages?page=${event.pageIndex + 1}`)
  }

  deleteContactMessage(msg: ContactMessage) {
    this.dialog
      .open(DeleteConfirmationDialogComponent)
      .afterClosed()
      .pipe(first())
      .subscribe(confirmation => {
        if(confirmation) {
          this.contactMessageService.delete(msg.id!).pipe(first()).subscribe(() => {
            this.ngOnInit();
          });
        }
      });
  }
}
