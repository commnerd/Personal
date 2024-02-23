import { ComponentFixture, TestBed } from '@angular/core/testing';

import { IndexComponent } from './index.component';
import { PackageService } from '../../../services/models/composer/package.service';
import { HttpClient, HttpHandler } from '@angular/common/http';
import { MatDialog } from "@angular/material/dialog";
import { ComposerModule } from "@pages/composer/composer.module";

describe('IndexComponent', () => {
  let component: IndexComponent;
  let fixture: ComponentFixture<IndexComponent>;
  let packageService: PackageService;
  let dialog: MatDialog;
  let httpClient: HttpClient;
  let httpHandler: HttpHandler;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ComposerModule],
      providers: [PackageService, MatDialog, HttpClient, HttpHandler],
      declarations: [IndexComponent]
    });
    fixture = TestBed.createComponent(IndexComponent);
    packageService = TestBed.inject(PackageService);
    dialog = TestBed.inject(MatDialog);
    httpClient = TestBed.inject(HttpClient);
    httpHandler = TestBed.inject(HttpHandler);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
