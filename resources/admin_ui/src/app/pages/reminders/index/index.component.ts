import { Component, OnInit } from '@angular/core';
import { MatDialog } from "@angular/material/dialog";

import { Paginated } from '@interfaces/laravel/paginated';
import { Reminder } from '@interfaces/reminder';
import { first } from 'rxjs';
import { ReminderService } from '@services/models/reminder.service';
import { ActivatedRoute, Router, Params } from '@angular/router';

import { DeleteConfirmationDialogComponent } from "@partials/delete-confirmation-dialog/delete-confirmation-dialog.component";
import { PageEvent } from '@angular/material/paginator';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {

  models: Paginated<Reminder> | null = null;

  constructor(
    public dialog: MatDialog,
    private reminderService: ReminderService,
    private router: Router,
    private activatedRoute: ActivatedRoute
  ) {}

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe((params: Params) => {
      let page = 1;
      if(typeof params['page'] !== 'undefined') {
        page = params['page'];
      }
      this.reminderService.list(page).pipe(first()).subscribe(rs => {
        this.models = rs;
      });
    });
  }

  addReminder() {
    this.router.navigate(['reminders', 'create']);
  }

  editReminder(rmd: Reminder) {
    this.router.navigate(['reminders', rmd.id, 'edit']);
  }

  switchPage(event: PageEvent) {
    this.router.navigateByUrl(`/reminders?page=${event.pageIndex + 1}`)
  }

  deleteReminder(reminder: Reminder) {
    this.dialog
      .open(DeleteConfirmationDialogComponent)
      .afterClosed()
      .pipe(first())
      .subscribe(confirmation => {
        if(confirmation) {
          this.reminderService.delete(reminder.id!).pipe(first()).subscribe(() => {
            this.ngOnInit();
          });
        }
      });
  }
}
