import { Component } from '@angular/core';
import { Paginated } from "@interfaces/laravel/paginated";
import { ActivatedRoute, Params, Router } from "@angular/router";
import { MatDialog } from "@angular/material/dialog";
import { PageEvent } from "@angular/material/paginator";
import {
  DeleteConfirmationDialogComponent
} from "@partials/delete-confirmation-dialog/delete-confirmation-dialog.component";
import { EmploymentRecordService } from "@services/models/employment-record.service";
import { EmploymentRecord } from "@interfaces/employment-record";

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent {
  models: Paginated<EmploymentRecord> | null = null;

  constructor(
    private employmentRecordService: EmploymentRecordService,
    private router: Router,
    private dialog: MatDialog,
    private activatedRoute: ActivatedRoute
  ) {}

  ngOnInit(): void {
    let routeSubscription = this.activatedRoute.queryParams.subscribe((params: Params) => {
      let page = 1;
      if(typeof params['page'] !== 'undefined') {
        page = params['page'];
      }
      let employmentRecordListSubscription = this.employmentRecordService.list(page).subscribe(rs => {
        this.models = rs;
        employmentRecordListSubscription.unsubscribe();
      });
      routeSubscription.unsubscribe();
    });
  }

  add() {
    this.router.navigate(['resume', 'create']);
  }

  edit(model: EmploymentRecord) {
    this.router.navigate(['resume', model.id, 'edit']);
  }

  switchPage(event: PageEvent) {
    this.router.navigateByUrl(`/resume?page=${event.pageIndex + 1}`)
  }

  delete(model: EmploymentRecord) {
    let dialogSubscription = this.dialog
      .open(DeleteConfirmationDialogComponent)
      .afterClosed()
      .subscribe(confirmation => {
        if(confirmation) {
          let deleteSubscription = this.employmentRecordService.delete(model.id!).subscribe(() => {
            this.ngOnInit();
            setTimeout(() => deleteSubscription.unsubscribe());
          });
        }
        setTimeout(() => dialogSubscription.unsubscribe());
      });
  }
}
