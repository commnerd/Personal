import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormComponent } from './form.component';
import { HttpClientTestingModule } from "@angular/common/http/testing";
import { RestaurantsModule } from "@pages/restaurants/restaurants.module";
import { BrowserAnimationsModule } from "@angular/platform-browser/animations";

describe('FormComponent', () => {
  let component: FormComponent;
  let fixture: ComponentFixture<FormComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ HttpClientTestingModule, RestaurantsModule, BrowserAnimationsModule ],
      declarations: [ FormComponent ]
    });
    fixture = TestBed.createComponent(FormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
