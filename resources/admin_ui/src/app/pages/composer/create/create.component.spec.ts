import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateComponent } from './create.component';
import { FormComponent } from '../form/form.component';
import { PackageService } from '../../../services/models/composer/package.service';
import { HttpClient, HttpHandler } from '@angular/common/http';
import { MatFormFieldModule } from '@angular/material/form-field';

describe('CreateComponent', () => {
  let component: CreateComponent;
  let fixture: ComponentFixture<CreateComponent>;
  let packageService: PackageService;
  let httpClient: HttpClient;
  let httpHandler: HttpHandler;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [MatFormFieldModule],
      providers: [PackageService, HttpClient, HttpHandler],
      declarations: [CreateComponent, FormComponent]
    });
    fixture = TestBed.createComponent(CreateComponent);
    component = fixture.componentInstance;
    packageService = TestBed.inject(PackageService);
    httpClient = TestBed.inject(HttpClient);
    httpHandler = TestBed.inject(HttpHandler);
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
