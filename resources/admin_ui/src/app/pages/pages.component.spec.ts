import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PagesComponent } from './pages.component';
import { PartialsModule } from '../partials/partials.module';
import { ActivatedRoute } from '@angular/router';
import { NavigationComponent } from '../partials/navigation/navigation.component';
import { RouterTestingModule } from '@angular/router/testing';

describe('PagesComponent', () => {
  let component: PagesComponent;
  let fixture: ComponentFixture<PagesComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [RouterTestingModule, PartialsModule],
      declarations: [PagesComponent, NavigationComponent]
    });
    fixture = TestBed.createComponent(PagesComponent);
    TestBed.inject(ActivatedRoute);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
