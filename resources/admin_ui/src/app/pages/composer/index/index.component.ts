import { Component, OnInit } from '@angular/core';
import { Paginated } from '../../../interfaces/laravel/paginated';
import { Package } from '../../../interfaces/composer/package';
import {first, Observable} from 'rxjs';
import { PackageService } from '../../../services/models/composer/package.service';
import { ActivatedRoute, Router, Params } from '@angular/router';
import {
  DeleteConfirmationDialogComponent
} from "@partials/delete-confirmation-dialog/delete-confirmation-dialog.component";
import { MatDialog } from "@angular/material/dialog";
import {PageEvent} from "@angular/material/paginator";

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss'],
})
export class IndexComponent implements OnInit {

  packages : Paginated<Package> | null = null;

  constructor(
    private packageService: PackageService,
    private router: Router,
    private dialog: MatDialog,
    private activatedRoute: ActivatedRoute
  ) {}

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe((params: Params) => {
      let page = 1;
      if(typeof params['page'] !== 'undefined') {
        page = params['page'];
      }
      this.packageService.list(page).pipe(first()).subscribe(rs => {
        this.packages = rs;
      });
    });
  }

  addPackage() {
    this.router.navigate(['composer', 'create']);
  }

  editPackage(pkg: Package) {
    this.router.navigate(['composer', pkg.id, 'edit']);
  }

  switchPage(event: PageEvent) {
    this.router.navigateByUrl(`/composer?page=${event.pageIndex + 1}`)

  }

  deletePackage(pkg: Package) {
    this.dialog
      .open(DeleteConfirmationDialogComponent)
      .afterClosed()
      .pipe(first())
      .subscribe(confirmation => {
        if(confirmation) {
          this.packageService.delete(pkg.id!).pipe(first()).subscribe(() => {
            this.ngOnInit();
          });
        }
      });
  }
}
