import { ComponentFixture, TestBed } from '@angular/core/testing';

import { IndexComponent } from './index.component';
import { PackageService } from '@services/models/composer/package.service';
import { HttpClient, HttpHandler } from '@angular/common/http';
import {MatDialog, MatDialogRef} from "@angular/material/dialog";
import { ComposerModule } from "@pages/composer/composer.module";
import {of} from "rxjs";
import {TestDataPaginator} from "../../../../testing/TestDataPaginator";
import {PackageSource} from "@interfaces/composer/package_source";
import {Package} from "@interfaces/composer/package";
import { RouterTestingModule } from '@angular/router/testing';
import { ActivatedRoute } from '@angular/router';

describe('IndexComponent', () => {
  let component: IndexComponent;
  let fixture: ComponentFixture<IndexComponent>;
  let packageService: PackageService;
  let dialog: MatDialog;
  let httpClient: HttpClient;
  let httpHandler: HttpHandler;
  let activatedRoute: ActivatedRoute;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ComposerModule, RouterTestingModule],
      providers: [PackageService, MatDialog, HttpClient, HttpHandler],
      declarations: [IndexComponent]
    });
    fixture = TestBed.createComponent(IndexComponent);
    packageService = TestBed.inject(PackageService);
    dialog = TestBed.inject(MatDialog);
    httpClient = TestBed.inject(HttpClient);
    httpHandler = TestBed.inject(HttpHandler);
    activatedRoute = TestBed.inject(ActivatedRoute);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('delete on confirmation', () => {
    let data: Array<Package> = [{
      id: 1,
      name: 'some name',
      version: 'v1',
      type: 'some type',
      sources: [],
    }];
    packageService.list = () => of((new TestDataPaginator(data)).get());
    const quoteServiceDeleteSpy = spyOn(packageService, 'delete');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();

    let content = fixture.nativeElement.querySelector('table').textContent;
    let deleteButton = fixture.nativeElement.querySelector('button.delete');
    expect(content).toContain("some name");
    expect(content).toContain("v1");
    expect(content).toContain("some type");

    spyOn(dialog, 'open').and.returnValue({
      afterClosed: () => of(true)
    } as unknown as MatDialogRef<any>);
    deleteButton.click();
    expect(quoteServiceDeleteSpy).toHaveBeenCalledTimes(1);
  });

  it('avoid delete on negating confirmation', () => {
    let data: Array<Package> = [{
      id: 1,
      name: 'some name',
      version: 'v1',
      type: 'some type',
      sources: [],
    }];
    packageService.list = () => of((new TestDataPaginator(data)).get());
    const drinkServiceDeleteSpy = spyOn(packageService, 'delete');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();

    let content = fixture.nativeElement.querySelector('table').textContent;
    let deleteButton = fixture.nativeElement.querySelector('button.delete');
    expect(content).toContain("some name");
    expect(content).toContain("v1");
    expect(content).toContain("some type");

    spyOn(dialog, 'open').and.returnValue({
      afterClosed: () => of(false)
    } as unknown as MatDialogRef<any>);
    deleteButton.click();
    expect(drinkServiceDeleteSpy).toHaveBeenCalledTimes(0);
  });

  it('should default to pulling first page', () => {
    activatedRoute.queryParams = of({});
    const packageServiceSpy = spyOn(packageService, 'list');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    expect(packageServiceSpy).toHaveBeenCalledOnceWith(1);
  });

  it('should pull page corresponding to passed page param', () => {
    activatedRoute.queryParams = of({page: 2});
    const packageServiceSpy = spyOn(packageService, 'list');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    expect(packageServiceSpy).toHaveBeenCalledOnceWith(2);
  });
});
