import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditComponent } from './edit.component';
import { PackageService } from '../../../services/models/composer/package.service';
import { HttpClient, HttpHandler } from '@angular/common/http';
import { ActivatedRoute, RouterModule } from '@angular/router';

describe('EditComponent', () => {
  let component: EditComponent;
  let fixture: ComponentFixture<EditComponent>;
  let packageService: PackageService;
  let httpClient: HttpClient;
  let httpHandler: HttpHandler;
  let activatedRoute: ActivatedRoute;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [RouterModule],
      providers: [PackageService, HttpClient, HttpHandler, ActivatedRoute],
      declarations: [EditComponent]
    });
    fixture = TestBed.createComponent(EditComponent);
    packageService = TestBed.inject(PackageService);
    httpHandler = TestBed.inject(HttpHandler);
    httpClient = TestBed.inject(HttpClient);
    activatedRoute = TestBed.inject(ActivatedRoute);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
